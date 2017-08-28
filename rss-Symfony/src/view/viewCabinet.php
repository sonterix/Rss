<div class="container">
  <div class="row">

    <table class="table table-hover">
          <?php 
              foreach ($mCabinet->getData() as $value) {
                echo "<tr>
                        <td><b style='color: #283147;'>$value[name]</b></td>
                        <td>$value[link]</td>
                        <td><a href='/editLink=$value[id]' name='but$value[id]' class='btn btn-default'>Edit</a></td>
                        <td><a href='/deleteLink=$value[id]' name='del$value[id]' class='btn btn-danger'>Delete</a></td>
                      </tr>";
              } 
          ?>
    </table>   

    <form action="/logout" method="GET">
      <div class="form-group"> 
        <a href="/addLink" name="addLink" class='btn btn-default'>Add link</a>
        <input type="submit" value="Logout" class="btn btn-primary">
      </div>
    </form>

  </div>
</div>