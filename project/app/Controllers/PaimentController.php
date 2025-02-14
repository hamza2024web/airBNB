<?php
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\AnnoncesModel;
use App\Models\ReservationModel;
use App\Controllers\View;
use Exception;
use \DateTime;

class PaimentController
{

    public function paiment()    {




        if (isset($_POST['prixTotale']) && isset($_POST['nuberOfDay']) && isset($_POST['dateStart'])) {

            $prixTotale = $_POST['prixTotale'];
            $numberOfDays = $_POST['nuberOfDay'];
            $dateStart = $_POST['dateStart'];
            $dateFine = $_POST['dateFine'];
            $prix = $_POST['prix'];

            $startDay = new Datetime($dateStart);
            $endtDay = new Datetime($dateFine);

            $diff = $startDay->diff($endtDay);

            if ($numberOfDays > $diff->days) {
                $days = $numberOfDays;

            } else {
                $days = $diff->days;
            }


            View::render('pyment.twig', ['prixTotale' => $prixTotale, 'days' => $days, 'prix' => $prix]);

        }
    }

    public function checkeDay()
    {

        $getAnnonces = new AnnoncesModel();
        $getDateOfReservation = new ReservationModel();


        $Annonces = $getAnnonces->getInforamtin(6);

        if (!$Annonces) {
            return false;
        }

        $Dates = $getDateOfReservation->getDate(6);

        $dateOfReservation = [];
        foreach ($Dates as $date) {
            $start = new DateTime($date->getReservationDateDebut());
            $end = new DateTime($date->getResevationDateFin());

            while ($start <= $end) {
                $dateOfReservation[] = $start->format('Y-m-d');
                $start->modify('+1 day');
            }
        }
        $jsonData = json_encode($dateOfReservation);
        View::render('checkeDay.twig', [
            'row' => $Annonces,
            'dates' => $dateOfReservation,
            'jsonDates' => $jsonData
        ]);

    }

    public function verifyPayment()
    {

        $rawData = file_get_contents(filename: 'php://input');
        $data = json_decode($rawData, true);


        if (isset($data['orderID']) && isset($data['payerID'])) {
            $orderID = $data['orderID'];
            $payerID = $data['payerID'];


            try {
                $paymentIsValid = $this->verifyPaymentWithPayPal($orderID, $payerID);

                if ($paymentIsValid) {
                    echo json_encode([
                        'success' => true,
                        'orderID' => $orderID,
                        'redirectUrl' => 'validation.php?orderID=' . $orderID
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'PIMENT IS SUCCSS'
                    ]);
                }
            } catch (Exception $e) {
                error_log('Error in verify_payment.php: ' . $e->getMessage());
                echo json_encode([
                    'success' => false,
                    'message' => 'SUME ERORR IS HUPEN'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid data received.'
            ]);
        }


    }



    private function getPayPalAccessToken($config)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_USERPWD, $config['client_id'] . ":" . $config['client_secret']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Accept-Language: en_US'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("Failed to get PayPal Access Token. HTTP code: $httpCode");
        }

        $responseData = json_decode($response, true);

        if (!isset($responseData['access_token'])) {
            throw new Exception("Invalid PayPal Access Token response.");
        }

        return $responseData['access_token'];
    }

    private function verifyPaymentWithPayPal($orderID, $payerID)
    {
        $paypalConfig = include __DIR__ . '/../../Config/paypal.php';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v2/checkout/orders/$orderID");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->getPayPalAccessToken($paypalConfig)
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("PayPal API returned HTTP code: $httpCode");
        }

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'COMPLETED' && $responseData['payer']['payer_id'] === $payerID) {
            return true;
        }

        return false;
    }

    private function loadView($viewName, $data = [])
    {
        extract($data);

        require_once __DIR__ . "/../../views/paiment/" . $viewName . ".php";
    }
}








