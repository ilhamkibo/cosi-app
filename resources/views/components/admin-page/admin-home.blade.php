<x-layouts.admin.admin-app>
    <div class="flex gap-2">
        <div class="w-content bg-green-75/40 rounded-lg p-2">
            <h1>Total Products: {{ $totalProducts }} items</h1>
            <ul class="list-disc list-inside">
                <li>Chairs: {{ $totalChairProduct }}</li>
                <li>Tables: {{ $totalTableProduct }}</li>
                <li>Others: {{ $totalOtherProduct }}</li>
            </ul>
        </div>
        <div class="w-content bg-blue-75/40 rounded-lg p-2">
            <h1>Total Articles: {{ $totalProducts }} items</h1>
            <ul class="list-disc list-inside">
                <li>Blog: {{ $totalChairProduct }}</li>
                <li>News: {{ $totalTableProduct }}</li>
                <li>Education: {{ $totalOtherProduct }}</li>
            </ul>
        </div>
        <div class="w-content bg-blue-75/40 rounded-lg p-2">
            <h1>Total Sales: {{ $totalProducts }} pcs</h1>
            <ul class="list-disc list-inside">
                <li>Shopee: {{ $totalChairProduct }}</li>
                <li>Tokped: {{ $totalTableProduct }}</li>
                <li>Direct WA: {{ $totalOtherProduct }}</li>
            </ul>
        </div>
        <div class="w-content bg-blue-75/40 rounded-lg p-2">
            <h1>Stock material: {{ $totalProducts }} pcs</h1>
            <ul class="list-disc list-inside">
                <li>Shopee: {{ $totalChairProduct }}</li>
                <li>Tokped: {{ $totalTableProduct }}</li>
                <li>Direct WA: {{ $totalOtherProduct }}</li>
            </ul>
        </div>

    </div>
</x-layouts.admin.admin-app>
