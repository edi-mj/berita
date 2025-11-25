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

function addArticle(array $data): void
{
	$stmnt = DBH->prepare('INSERT INTO Artikel (judul, isi, id_penulis) VALUES (:judul, :isi, :id_penulis)');
	$stmnt->execute([
		":judul" => htmlspecialchars($data['judul']),
		":isi" => htmlspecialchars($data['isi']),
		"id_penulis" => $data['id_penulis']
	]);
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
