<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/header.php";
function is_user_logged_in() {
    return isset($_SESSION['userid']);
}

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'idx';

function get_sort_query($sort) {
    $query = "SELECT * FROM free_board_table";
    $query .= " ORDER BY ";
    
    if ($sort === 'view') {
        $query .= "view DESC";
    } elseif ($sort === 'like_count') {
        $query .= "like_count DESC";
    } else {
        $query .= "idx DESC";
    }
    
    return $query;
}

$sql = get_sort_query($sort);
$result = mc($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>자유게시판</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <style>
        /* Your existing styles */

        /* Button styling */
        .sort-btn {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 15px;
            background-color: #E50914;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sort-btn:hover {
            background-color: #FF141F;
        }
        
        /* Table styling */
        .list-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .list-table th, .list-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .list-table th {
            background-color: #f1f1f1;
        }

        .list-board a {
            color: #E50914;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .list-board a:hover {
            color: #FF141F;
        }

        /* Write button styling */
        #write_btn {
            margin-top: 10px;
        }

        #write_btn button {
            background-color: #E50914;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #write_btn button:hover {
            background-color: #FF141F;
        }
    </style>
</head>
<body>
    <div id="board_area" class="container mt-4">
        <h1 class="mb-3">자유게시판</h1>
        <div id="button_area">
            <button class="sort-btn" data-sortby="idx">순번순</button>
            <button class="sort-btn" data-sortby="view">조회순</button>
            <button class="sort-btn" data-sortby="like_count">추천순</button>
        </div>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">조회수</th>
                    <th width="100">추천</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($board = $result->fetch_array()) {
                    $title = $board["title"];
                    if (strlen($title) > 30) {
                        $title = str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8") . "...", $board["title"]);
                    }
                ?>
                <tr class="list-board">
                    <td width="70"><?php echo $board['idx']; ?></td> 
                    <td width="500"><a href="free_board_detail.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
                    <td width="120"><?php echo $board['name']?></td>
                    <td width="100"><?php echo $board['view']; ?></td>
                    <td width="100"><?php echo $board['like_count']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="write_btn">
            <?php if (is_user_logged_in()) { ?>
            <a href="free_board_write.php"><button>글쓰기</button></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>
