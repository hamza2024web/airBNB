<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LankaStay Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-3xl mx-auto bg-white p-8 border-2 border-gray-200 rounded-xl">
        <!-- Logo -->
        <div class="text-center mb-12">
            <h1 class="text-2xl">
                <span class="text-blue-600">Lanka</span>Stay.
            </h1>
        </div>

        <!-- Progress Steps -->
        <div class="flex justify-center items-center gap-4 mb-12">
            <div class="w-10 h-10 rounded-full bg-emerald-400 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">2</div>
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">3</div>
        </div>

        <!-- Booking Information -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Booking Information</h2>
            <p class="text-gray-400">Please fill up the blank fields below</p>
        </div>

        <!-- Main Content -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Left Side - Image -->
            <div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="<?php echo $row->getPhoto()?>"/>
                </div>
                <div class="mt-4">
                    <h3 class="text-xl font-semibold text-gray-800"><?php echo $row->getTitle()?>;
                </h3>
                    <p class="text-gray-500"><?php echo $row->getDescription()?></p>
                </div>
            </div>

            <!-- Right Side - Booking Form -->
            <div class="space-y-6">
                <!-- Duration Selection -->
                <div>
                    <label class="block text-gray-700 mb-2">How long you will stay?</label>
                    <div class="flex items-center gap-4">
                        <button id="decreaseDays" class="w-10 h-10 rounded-lg bg-red-500 text-white flex items-center justify-center">-</button>
                        <span id="daysCount" class="text-gray-700 px-4 py-2">2 Days</span>
                        <button id="increaseDays" class="w-10 h-10 rounded-lg bg-emerald-400 text-white flex items-center justify-center">+</button>
                    </div>
                </div>

                <!-- Date Selection -->
                <div class="mb-4 ">
                    <label for="bday" class="block  text-gray-700 text-sm font-semibold mb-2">
                    Please select a date:
                    </label>
                    <input type="text" id="bday" value = '12/12/2025' class="w-full bg-gray-200 border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                </div>
                
                <!-- Price Information -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">You will pay</span>
                        <span id="totalPrice" class="text-xl font-bold">$<?php echo $row->getTitle()?> USD</span>
                    </div>
                    <div class="text-gray-500 text-sm">per <span id="totalDays">2</span> Days</div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <form method="post" action="paiment">
                    <input name='prixTotale' id = 'totalPriceSubmit' type="text" value = '' hidden>
                    <input name='nuberOfDay' id = 'nuberOfDay' type="text" value = '' hidden>
                    <button name = 'submit' id = 'submit' class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Book Now
                    </button>
                    </form>

                    <button class="w-full bg-gray-100 text-gray-600 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Configuration
        const PRICE_PER_DAY = <?php echo $row->getPrix()?>; // $200 USD per day
        const MIN_DAYS = 1;
        const MAX_DAYS = 14;

        // DOM Elements
        const decreaseDaysBtn = document.getElementById('decreaseDays');
        const increaseDaysBtn = document.getElementById('increaseDays');
        const daysCountSpan = document.getElementById('daysCount');
        const dateRangeSpan = document.getElementById('dateRange');
        const totalPriceSpan = document.getElementById('totalPrice');
        const totalDaysSpan = document.getElementById('totalDays');
        const totalPriceSubmit = document.getElementById('totalPriceSubmit');
        const nuberOfDay = document.getElementById('nuberOfDay');

        console.log(totalPriceSubmit)
        console.log(nuberOfDay)
        // State
        let numberOfDays = 1;
        let startDate = new Date();

        // Functions
        function updateDisplay() {
            // Update days display
            daysCountSpan.textContent = `${numberOfDays} Days `;
            totalDaysSpan.textContent = numberOfDays;
            nuberOfDay.value = numberOfDays;

            // Update price
            const totalPrice = numberOfDays * PRICE_PER_DAY ;
            totalPriceSpan.textContent = `$${totalPrice} USD`;

            totalPriceSubmit.value = totalPrice;
            

            // Update date range
            const endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + numberOfDays);
            
            const formatDate = (date) => {
                const day = date.getDate();
                const month = date.toLocaleString('default', { month: 'short' });
                return `${day} ${month}`;
            };

            dateRangeSpan.textContent = `${formatDate(startDate)} - ${formatDate(endDate)}`;
        }

        function increaseDays() {
            if (numberOfDays < MAX_DAYS) {
                numberOfDays++;
                updateDisplay();
            }
        }

        function decreaseDays() {
            if (numberOfDays > MIN_DAYS) {
                numberOfDays--;
                updateDisplay();
            }
        }

        // Event Listeners
        increaseDaysBtn.addEventListener('click', increaseDays);
        decreaseDaysBtn.addEventListener('click', decreaseDays);

        // Initialize display
        updateDisplay();
    </script>
    <script src = "../public/js/calendrier.js"></script>
    

    
</body>
</html>