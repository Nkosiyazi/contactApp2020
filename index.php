<?php
  include 'header.php';

  $contacts = $db->query('SELECT * FROM contacts')->fetchALL(PDO::FETCH_ASSOC);
?>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
<style>
    * {
        box-sizing: border-box;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li a {
        border: 1px solid #ddd;
        margin-top: -1px; /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }
</style>

<div class="container panel panel-default">
  <div class="row panel-heading">
      <div class=" row panel-heading col-xs-6 col-sm-6 left-detail">
          <h1 class="panel-title">Contacts APP</h1>
      </div>
      <div class="col-xs-6 col-sm-6 right-detail">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
      </div>
  </div>

<?php foreach ($contacts as $contact) :?>
    <ul id="myUL">
        <li>
        <a href="./edit.php?id=<?=$contact['id'];?>">
        <div class="row contact-box" id="presentation">
          <div class="col-xs-6 col-sm-6 left-detail">
            <?= $contact['first']; ?> <?= $contact['last']; ?><br>
            <?= $contact['title']; ?></span><br>

            <i class="fa fa-mobile" aria-hidden="true">&nbsp;&nbsp;</i><?= $contact['phone']; ?><br>
            <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<?= $contact['address']; ?><br>
            <?= $contact['city']; ?>, <?= $contact['state']; ?> <?= $contact['zipcode']; ?><br>
            <i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;&nbsp;<?= $contact['notes']; ?><br>
          </div>
        </div>
      </a>
        </li>
    </ul>
<?php endforeach; ?>

</div>

<div id="container-floating">

  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="location.href='new.php';">
    <p class="plus">+</p>
    <img class="edit" src="http://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">
  </div>

</div>


<?php include 'footer.php';?>
