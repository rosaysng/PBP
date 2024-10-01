<?php

require_once('./lib/db_login.php');

$judul = $_GET['judul'];

$query = "SELECT b.isbn as isbn, b.author as author, b.title as title, c.name as category, b.price as price, b.stock as stock FROM books b, categories c WHERE b.categoryid = c.categoryid AND b.title LIKE '%$judul%' ORDER BY b.isbn";

$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br>" . $db->error);
}

if ($result->num_rows == 0) {
  echo '<div class="alert alert-danger" role="alert">Buku tidak ditemukan</div>';
  exit;
}

while ($row = $result->fetch_object()) {
  echo
  '<div class="card">
    <div class="card-body">
      <h5 class="card-title">'.$row->title.'</h5>
      <h6 class="card-subtitle mb-2 text-muted">'.$row->author.'</h6>
      <table class="table">
        <tr>
          <th style="width: 100px;">ISBN</th>
          <td>'.$row->isbn.'</td>
        </tr>
        <tr>
          <th>Category</th>
          <td>'.$row->category.'</td>
        </tr>
        <tr>
          <th>Price</th>
          <td>$'.$row->price.'</td>
        </tr>
        <tr>
          <th>Stock</th>
          <td>'.$row->stock.'</td>
        </tr>
      </table>
    </div>
  </div>';
}

$result->free();
$db->close();