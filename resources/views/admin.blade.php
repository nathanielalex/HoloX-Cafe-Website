
<!-- use Illuminate\Support\Facades\Storage; -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Admin Page</h1>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Foto</th>
            </tr>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{$barang->id}}</td>
                    <td>{{$barang->kategori}}</td>
                    <td>{{$barang->nama}}</td>
                    <td>{{$barang->harga}}</td>
                    <td>{{$barang->jumlah}}</td>
                    <td>
                        <img width="200px" height="200px" src="{{\Illuminate\Support\Facades\Storage::url($barang->image)}}">   
                    </td>
                    <td>
                        <form action="/barang/{{$barang->id}}" method="POST">
                            {{method_field('DELETE')}}
                            @csrf
                            <input type="submit" value="delete" class="submit-btn">
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    
    <!-- karena ada file harus pake enctype ini -->
    <div class="form-container">
        <form enctype="multipart/form-data" action="/barang" method="POST" class="form-insert">
            <h2 class="form-title">Insert</h2>
            @csrf
            <div class="input-wrapper">
                <label for="kategori">Kategori Barang</label>
                <input type="text" name="kategori" placeholder="kategori" id="kategori" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="name">Nama Barang</label>
                <input type="text" name="nama" placeholder="name" id="name" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="harga">Harga Barang</label>
                <input type="number" name="harga" placeholder="harga" id="harga" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="stock">Jumlah Barang</label>
                <input type="number" name="jumlah" placeholder="stock" id="stock" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="image">Foto Barang</label>
                <input type="file" name="image" id="image" class="input-class">
            </div>
            
            <input type="submit" value="insert" class="submit-btn">
        </form>
    </div>
    <div class="form-container">
        <form enctype="multipart/form-data" action="/barang" method="POST">
            <h2 class="form-title">Update</h2>
            {{method_field('PUT')}}
            @csrf
            <div class="input-wrapper">
                <label for="id-update">ID Barang</label>
                <input type="number" name="id" placeholder="id" id="id-update" class="input-class">
            </div>
           
            <div class="input-wrapper">
                <label for="kategori-update">Kategori Barang</label>
                <input type="text" name="kategori" placeholder="kategori" id="kategori-update" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="nama-update">Nama Barang</label>
                <input type="text" name="nama" placeholder="name" id="nama-update" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="harga-update">Harga Barang</label>
                <input type="number" name="harga" placeholder="harga" id="harga-update" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="stock-update">Jumlah Barang</label>
                <input type="number" name="jumlah" placeholder="stock" id="stock-update" class="input-class">
            </div>
            
            <div class="input-wrapper">
                <label for="image-update">Foto Barang</label>
                <input type="file" name="image" id="image-update" class="input-class">
            </div>
            
            <input type="submit" value="insert" class="submit-btn">
        </form>
    </div>
</body>
</html>