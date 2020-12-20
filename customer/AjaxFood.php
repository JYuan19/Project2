<?php
$connect = new PDO("mysql:host=localhost; dbname=foodtiger", "root", "");
  $limit = '9';
  $page = 1;
  if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
  } else {
    $start = 0;
  }

  $query = "SELECT * FROM food ";

  if ($_POST['query'] != '') {
    $query .= 'WHERE nameFood LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"';
  }

  $query .= 'ORDER BY f_id ASC ';

  $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
  $statement = $connect->prepare($query);
  $statement->execute();
  $total_data = $statement->rowCount();
  $statement = $connect->prepare($filter_query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_filter_data = $statement->rowCount();

  $output = '
<div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
<div class="row">
';
  if ($total_data > 0) {
    foreach ($result as $row) {
      $output .= '
    
    <div class="col-md-4 col-sm-6" >
        <div class="product-grid9" style="text-align:center;">
            <div class="product-image9">
                <a href="fooddetails.php?f_id=' . $row['f_id'] . '"><img src="image/' . $row["imageFood"] . '" class="img-fluid" style="width:400px; height:300px;object-fit: contain;"></a>
            </div>
            <div class="product-content" style="text-align:left;">
                <h3 class="title"><a href="fooddetails.php?f_id=' . $row['f_id'] . '">' . $row['nameFood'] . '</a></h3>
                <div class="price">RM ' . $row['price'] . '</div>
                <a class="add-to-cart" href="fooddetails.php?f_id=' . $row['f_id'] . '">VIEW PRODUCT</a>
            </div>
        </div>
    </div> 
         

    ';
    }
  } else {
    $output .= '
  <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
    <div class="row">
      <div class="container"  style="width:100%; height:500px;" >
        <h1 style="text-align: center;">No Result....</h1>
      </div>
    </div>
  </div>
  ';
  }

  $output .= '
</div>
</div>
  <ul class="pagination " style="margin-bottom: 2%;margin-left: 69%;">
';

  $total_links = ceil($total_data / $limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';

  if ($total_links > 4) {
    if ($page < 5) {
      for ($count = 1; $count <= 5; $count++) {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    } else {
      $end_limit = $total_links - 5;
      if ($page > $end_limit) {
        $page_array[] = 1;
        $page_array[] = '...';
        for ($count = $end_limit; $count <= $total_links; $count++) {
          $page_array[] = $count;
        }
      } else {
        $page_array[] = 1;
        $page_array[] = '...';
        for ($count = $page - 1; $count <= $page + 1; $count++) {
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
      }
    }
  } else {
    for ($count = 1; $count <= $total_links; $count++) {
      $page_array[] = $count;
    }
  }
  if (!$total_data == 0) {
    for ($count = 0; $count < count($page_array); $count++) {
      if ($page == $page_array[$count]) {
        $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
          $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
        } else {
          $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id > $total_links) {
          $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
        } else {
          $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
      } else {
        if ($page_array[$count] == '...') {
          $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
        } else {
          $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
        }
      }
    }
  }
  $output .= $previous_link . $page_link . $next_link;
  $output .= '
</div>
  </ul>
';

  echo $output;
?>

