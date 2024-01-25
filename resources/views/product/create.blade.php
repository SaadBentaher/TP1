<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Produit</title>
</head>
<body>
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="Libelle">Libelle:</label>
    <input type="text" name="Libelle" required>
    
    <label for="Marque">Marque:</label>
    <input type="text" name="Marque" required>
    
    <label for="Prix">Prix:</label>
    <input type="number" name="Prix" step="0.01" required>
    
    <label for="Stock">Stock:</label>
    <input type="number" name="Stock" required>
    
    <label for="Image">Image:</label>
    <input type="file" name="Image">
    
    <button type="submit">Créer Produit</button>
</form>
</body>
</html>
