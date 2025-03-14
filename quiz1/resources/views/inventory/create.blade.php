<h1>Create Inventory Item</h1>
<form method="POST" action="/inventory">
    @csrf
    <label>Name:</label> <input type="text" name="name" required><br>
    <label>Quantity:</label> <input type="number" name="quantity" required><br>
    <label>Price:</label> <input type="number" name="price" required><br>
    <button type="submit">Create</button>
</form>
<a href="/inventory">Back</a>
