<?php

$conexion = new PDO('mysql: host=localhost; dbname=empresa','root', 'root');

if($_POST['action'] == 'new')
    add($conexion);
if($_POST['action'] == 'list')
    get($conexion);
if($_POST['action'] == 'del')
    del($conexion);

function add($conexion){
    $query = $conexion->prepare('INSERT INTO empresa (name, value, color) VALUES (?, ?, ?)');
    $query->bindParam(1, $_POST['name']);
    $query->bindParam(2, $_POST['value']);
    $query->bindParam(3, $_POST['color']);

    return $query->execute();
}

function get($conexion){
    $query = $conexion->prepare('SELECT * FROM empresa ORDER BY value DESC');
    $query->execute();
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
}

function del($conexion){
    $query = $conexion->prepare('DELETE FROM empresa WHERE id = ?');
    $query->bindParam(1, $_POST['id']);
    return $query->execute();
}