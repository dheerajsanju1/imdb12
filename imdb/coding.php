<?php   
        if(isset($_REQUEST['ser']))
        {
            $key= $_REQUEST['keyword'];
            

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/auto-complete?q=$key",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
                "X-RapidAPI-Key: 7f06bc67c9mshb15b8056c681064p1e6ecejsn8ee17924fc4a"
            ],
        ]);

        $response = curl_exec($curl);
        $response=json_decode($response,true);
        $err = curl_error($curl);

        echo "<pre>";
        print_r($response);

        curl_close($curl);


        $show  ="<b> Movie Name : </b>".$response['d']['0']['l']."<br/><br/>";
        $show .="<b> Type : </b>".$response['d']['0']['qid']."<br/><br/>";
        $show .="<b> Cast : </b>".$response['d']['0']['s']."<br/><br/>";
        $show .="<b> Year : </b>".$response['d']['0']['y']."<br/><br/>";
        $show .="<b> Rank : </b>".$response['d']['0']['rank']."<br/><br/>";

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="imdb.css">
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Edu+NSW+ACT+
    Foundation&family=Oswald:wght@300&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
</head>
<body>
        <div class="main">
            <h1>SEARCH ABOUT MOVIE</h1>
        </div>
        <div class="inner">
            <form action="" method="post">
                <input type="text" name="keyword">
                <input class="button" type="submit" name="ser" value="Search">
            </form>
    
    
            <img style=" width:356px; height:360px; margin-left:20px;" src="
            <?php echo $response['d']['0']['i']['imageUrl'] ?>" alt="" >
            <div class="main1">
                <?php
                if($show)
                {
                    echo "$show";
                    
            
                }
        
                ?>
      </div>
  </div>
</body>
</html>