<div class="container">
  <div class="row"><br>
    <div class="main">
    
        <form action="/editLink" method="POST">
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?php echo $currentDate['id'] ?>">
                <input class="form-control" type="text" name="editName" placeholder="Name" value="<?php echo $currentDate['name'] ?>" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="url" name="editLink" placeholder="Link" value="<?php echo $currentDate['link'] ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="/cabinet" class="btn btn-default">Back</a>
            </div>
        </form>

    </div>
  </div>
</div>

