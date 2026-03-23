<?php
function getProjects($pdo) {
    $stmt = $pdo->query ("SELECT * FROM projects ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProjectById($pdo, $id){
    $stmt = $pdo->prepare ("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function create_Project($pdo, $title, $descr, $imageName) {
    $stmt = $pdo->prepare ("INSERT INTO projects (title, descr, image) VALUES (?, ?, ?)");
    return  $stmt->execute ([$title, $descr, $imageName]);
}

function update_Project($pdo, $id, $title, $descr, $imageName){
    if ($imageName){
        $stmt = $pdo->prepare ("UPDATE projects SET title = ?, descr = ?, image = ? WHERE id = ?");
        return $stmt->execute ([$title, $descr, $imageName, $id]);
    }else{
        $stmt = $pdo-> prepare ("UPDATE projects SET title = ?, descr= ? WHERE id = ?");
        return $stmt->execute ([$title, $descr, $id]);
    }
}

function delete_Project($pdo, $id){
    $stmt = $pdo->prepare ("DELETE FROM projects WHERE id = ?");
    return $stmt->execute ([$id]);
}








?>