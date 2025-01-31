<?php
include("util/db.php");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? '%' . $conn->real_escape_string($_GET['search']) . '%' : '%';
$sort = isset($_GET['sort']) ? $conn->real_escape_string($_GET['sort']) : 'title_asc';

include("util/server_config.php");
$limit = get_config("pagination");
$offset = ($page - 1) * $limit;

$sortField = 'title';
$sortDirection = 'ASC';

switch ($sort) {
    case 'title_desc':
        $sortField = 'title';
        $sortDirection = 'DESC';
        break;
    case 'release_date_asc':
        $sortField = 'release_date';
        $sortDirection = 'ASC';
        break;
    case 'release_date_desc':
        $sortField = 'release_date';
        $sortDirection = 'DESC';
        break;
    case 'price_asc':
        $sortField = 'price';
        $sortDirection = 'ASC';
        break;
    case 'price_desc':
        $sortField = 'price';
        $sortDirection = 'DESC';
        break;
}

// Pretraživanje uz sortiranje i paginaciju
$sql = "SELECT * FROM games WHERE title LIKE ? OR publisher LIKE ? OR developer LIKE ? ORDER BY $sortField $sortDirection LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $search, $search, $search, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

$games = [];
while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}

// Broj igra za parinaciju
$sqlTotal = "SELECT COUNT(*) as total FROM games WHERE title LIKE ? OR publisher LIKE ? OR developer LIKE ?";
$stmtTotal = $conn->prepare($sqlTotal);
$stmtTotal->bind_param("sss", $search, $search, $search);
$stmtTotal->execute();
$resultTotal = $stmtTotal->get_result();
$totalGames = $resultTotal->fetch_assoc()['total'];

$totalPages = ceil($totalGames / $limit);

echo json_encode([
    'games' => $games,
    'totalPages' => $totalPages,
]);

$stmt->close();
$stmtTotal->close();
$conn->close();
?>