<?php
require_once('base.php');
require_once(BASE_PATH . '/conn.php');

function getAllArticles()
{
	$stmnt = DBH->prepare(
		'SELECT
			a.*, 
		    penulis.nama_lengkap AS namaPenulis, 
		    redaktur.nama_lengkap AS namaRedaktur 
		FROM Artikel AS a
		LEFT JOIN pengguna AS penulis
			ON a.id_penulis = penulis.id_user
		LEFT JOIN pengguna AS redaktur
			ON a.id_redaktur = redaktur.id_user'
	);
	$stmnt->execute();
	$articles = $stmnt->fetchAll();
	return $articles;
}

function addArticle(array $data, string $file_image): void
{
	$stmnt = DBH->prepare('INSERT INTO Artikel (judul, isi, id_penulis, file_gambar) VALUES (:judul, :isi, :id_penulis, :file_gambar)');
	$stmnt->execute([
		":judul" => htmlspecialchars($data['judul']),
		":isi" => htmlspecialchars($data['isi']),
		"id_penulis" => $data['id_penulis'],
		":file_gambar" => $file_image
	]);
	move_uploaded_file($_FILES["cover"]["tmp_name"], BASE_PATH . '/assets/img/uploads/' . $file_image);
}

function editArticle(int $id, array $data): void
{
	$stmnt = DBH->prepare('UPDATE Artikel SET judul = :judul, isi = :isi WHERE id_artikel = :id_artikel');
	$stmnt->execute([
		":judul" => htmlspecialchars($data['judul']),
		":isi" => htmlspecialchars($data['isi']),
		":id_artikel" => $id
	]);
}

function getArticleById(int $id)
{
	$stmnt = DBH->prepare(
		'SELECT * FROM Artikel WHERE id_artikel = :id'
	);
	$stmnt->execute([
		":id" => $id
	]);
	$articles = $stmnt->fetch();
	return $articles;
}

function deleteArticle(int $id): void
{
	$stmnt = DBH->prepare('DELETE FROM Artikel WHERE id_artikel = :id_artikel');
	$stmnt->execute([
		":id_artikel" => $id
	]);
}

function getArticlesBySearch(string $keyword)
{
	$stmnt = DBH->prepare(
		'SELECT
			a.*, 
		    penulis.nama_lengkap AS namaPenulis, 
		    redaktur.nama_lengkap AS namaRedaktur 
		FROM Artikel AS a
		JOIN pengguna AS penulis
			ON a.id_penulis = penulis.id_user
		JOIN pengguna AS redaktur
			ON a.id_redaktur = redaktur.id_user
		WHERE a.judul LIKE :keyword'
	);
	$stmnt->execute([
		":keyword" => "%" . $keyword . "%"
	]);
	$articles = $stmnt->fetchAll();
	return $articles;
}

function countArticlesCategory(): array
{
	$stmnt = DBH->prepare(
		'SELECT nama_kategori AS kategori, COUNT(*) as jumlah FROM `kategori` AS k JOIN `artikel_kategori` AS ak ON ak.id_kategori = k.id_kategori GROUP BY ak.id_kategori;'
	);

	$stmnt->execute();
	return $stmnt->fetchAll();
}
