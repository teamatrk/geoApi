<?php 
    require_once("config/config.php");
?>
<!DOCTYPE html>
<html itemscope itemtype="https://schema.org/QAPage" class="html__responsive " lang="en">
    <head>
        <title>Coordinates From Address</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/app.css" crossorigin="anonymous">
    </head>
    <body>
            
        <div class="container">
          <div class="alert alert-danger" id="error_box" style="display:none"></div>
          <div class="page-header">
            <h1>Get Coordinates By Address</h1>
            
          </div>

          <h3>Start Typing Address</h3>
          <form id="main_form">
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input class="form-control" type="text" name="" id="address">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Submit">
                    </div>
                </div>
              
              </div>
          </form>

          <div id="result" class="d-none">
            <h3 id="address_dispaly"></h3>
            <div class="row list">
              
            </div>
          </div>

<button class="btn btn-primary d-none" type="button" id="loader">
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>

 



 





        </div> <!-- /container -->
        <script type="text/javascript">
            var ACTION_URL = '<?php echo ACTION_URL;?>';
        </script>
        <script type="text/javascript" src="public/js/app.js"></script>

    </body>