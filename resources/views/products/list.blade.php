<x-template title="List">
    Ini List Products
</x-template>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['description'] }}</td>
            <td>{{ $product['price'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<x-button text="Add New Product"/>
