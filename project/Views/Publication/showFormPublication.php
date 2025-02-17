
<?php include '/var/www/html/Views/Layout/header.php' ?>

<article class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Insert New Annonce</h2>
        <form action="insert_annonce.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-lg" required>
            </div>
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" id="photo" name="photo" class="mt-1 p-2 w-full border rounded-lg" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3" class="mt-1 p-2 w-full border rounded-lg" required></textarea>
            </div>
            <div>
                <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" step="10" id="prix" name="prix" class="mt-1 p-2 w-full border rounded-lg" required>
            </div>
            <div>
           <select id="disponibilite" name="disponibilite" class="mt-1 p-2 w-full border rounded-lg">
                    <option value="Disponible">Disponible</option>
                    <option value="Not Disponible">Not Disponible</option>
                    <!-- Populate promotions dynamically from database -->
                </select>
            </div>
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id" class="mt-1 p-2 w-full border rounded-lg" required>
                    <option value="">Select Category</option>
                    <!-- Populate categories dynamically from database -->
                </select>
            </div>
            <div>
                <label for="promotion_id" class="block text-sm font-medium text-gray-700">Promotion</label>
                <select onchange='changeValue(this.value)' id="promotion_id" name="promotion_id" class="mt-1 p-2 w-full border rounded-lg">
                    <option value="No Promotion">No Promotion</option>
                    <option value="Promotion"> Promotion</option>
                    <!-- Populate promotions dynamically from database -->
                </select>
            </div>
          <div id='activePromotion' class="hidden">
                  <label for="porcentage" class="block text-sm font-medium text-gray-700">Promotion Porcentage</label>
                <input type="number" onchange="test(this.value)" step="1" id="porcentage" name="porcentage" class="mt-1 p-2 w-full border rounded-lg" >
          </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Submit</button>
        </form>
    </div>
</article>
<script>
function changeValue(value){
if(value==="Promotion"){
   document.getElementById('activePromotion').classList='block';

}
  
}
function test(value){
    let Price=document.getElementById('prix').value;
    let priceAfterCalcul=(value/100)*Price;
    PriceTotal=Price-priceAfterCalcul
    console.log( PriceTotal)
    Price= PriceTotal;
    document.getElementById('prix').value= PriceTotal
}
</script>
<?php include '/var/www/html/Views/Layout/footer.php' ?>