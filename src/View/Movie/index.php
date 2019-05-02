<link rel="stylesheet" type="text/css" href="/PiePHP/webroot/css/movieIndex.css">

<div class="container-fluid">
  <form method="POST">
    <?php if($read) { ?> 
      <h1 class="movieTitle">Movie list</h1>
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Genre</th>
          <th>Resume</th>
          <th>Release date</th>
          <th>length</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      <?php } else { 
        echo '<div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="error-template">
        <h1>Oops !</h1>
        <h2>0 Résult Found</h2>
        <div class="error-details">There is not result for the film, genre or distrib you\'re looking for !</div>
        </div>
        </div>
        </div>
        </div>
        <table>';
      }

      foreach($read as $value) { ?>
        <tr>
          <td><?= "<a href='/PiePHP/movie/$value[id_film]' >Description</a>" ?></td>
          <td><input size="18" name="movieTitle" placeholder="<?= $value['titre'] ?>"></td>
          <td><input maxlength="15" size="11" name="movieGenre" placeholder="<?= $value['genre'] ?>"></td>
          <td><textarea rows="4" cols="55" name="movieResume"><?= $value['resum'] ?></textarea></td>
          <td><input maxlength="4" size="1" name ="movieYear" placeholder="<?= $value['annee_prod'] ?>"></td>
          <td><input maxlength="3" size="1" name ="movieLength" placeholder="<?= $value['duree_min'] ?>m"></td>
          <td><button class="btn btn-success" name="movieUpdate"><i class="fa fa-refresh "></i></button></td>
          <td><button class="btn btn-danger" value='<?= $value['id_film'] ?>' name="movieDelete"><i class="fa fa-trash "></i></button></td> 
        </tr>
      <?php } ?>
    </table>
  </form>

  <form method="POST">
    <h1 class="movieTitle">Add a movie</h1>
    <table>
      <tr>
        <th>Title</th>
        <th>Genre</th>
        <th>Resume</th>
        <th>Release date</th>
        <th>length</th>
        <th>add</th>
      </tr>
      <tr>
        <td><input size="18" name="addTitle" placeholder="Insert title"></td>
        <td><input maxlength="15" size="11" name="addGenre" placeholder="Insert genre"></td>    
        <td><textarea rows="1" cols="50" name="addResume" placeholder="Insert resume"></textarea></td>
        <td><input maxlength="4" size="13" name ="addYear" placeholder="Insert released date"></td>
        <td><input maxlength="3" size="13" name ="addLength" placeholder="Insert movie length"></td>
        <td><button class="btn btn-success" name="addMovie"><i class="fa fa-plus"></i></button></td>
      </tr>
    </table>

    <h1 class="movieTitle">Add and Delete a genre</h1>
    <table>
      <tr>
        <th>New genre</th>
        <th>Add</th>
        <th>All genres</th>
        <th>Delete</th>
      </tr>
      <tr>
        <td><input maxlength="15" size="11" name="newGenre" placeholder="Insert genre"></td>
        <td><button class="btn btn-success" name="addGenre"><i class="fa fa-plus"></i></button></td>

        <td><select name="genreDelete">
          <?php foreach($genre as $val) {  ?>

            <option value="<?= $val['id_genre']?>"><?= $val['nom'] ?></option>
          <?php } ?> 
        </select>
        </td>
          <td><button class="btn btn-danger" name="submitDelete"><i class="fa fa-trash "></i></button></td> 
      </tr>
    </table>
  </form>
</div>