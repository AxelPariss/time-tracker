<?php
session_start();

require_once 'config.php';

// Infos from the last insertion
$last_session = $db->prepare('SELECT id, end FROM sessions WHERE id_user = ? ORDER BY id DESC LIMIT 1');
$last_session->execute([$id_user]);
$last_session = $last_session->fetch();


if(!empty($last_session) && time() - strtotime($last_session['end']) < 22){ // If the time between now and the last insertion is little
    // Update the end of the current session
    $update = $db->prepare('UPDATE sessions SET end = NOW() WHERE id = ? AND id_user = ?');
    $update->execute([$last_session['id'], $id_user]);
}else{
    // Insert a new session
    $insert = $db->prepare('INSERT INTO sessions (id_user, start, end) VALUES (?, NOW(), NOW() + INTERVAL 10 SECOND)');
    $insert->execute([$id_user]);
}