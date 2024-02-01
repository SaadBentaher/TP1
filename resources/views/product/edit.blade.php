<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de Produit</title>
</head>
<body>
    
<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')   
    <label for="Libelle">Libelle:</label>
    <input type="text" name="Libelle" value="{{ $product->Libelle }}" required>
    
    <label for="Marque">Marque:</label>
    <input type="text" name="Marque" value="{{ $product->Marque }}" required>
    
    <label for="Prix">Prix:</label>
    <input type="number" name="Prix" value="{{ $product->Prix }}" step="0.01" required>
    
    <label for="Stock">Stock:</label>
    <input type="number" name="Stock" value="{{ $product->Stock }}" required>
    
    <label for="Image">Image:</label>
    <input type="file" name="Image">
    
    <button type="submit">Modifier</button>
</form>
</body>
</html>
