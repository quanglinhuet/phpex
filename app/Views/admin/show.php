<div class="jumbotron">
    <div class="container">
        <table>
            <tr>
                <td style="width: 100%;">
                    <h3><?= $item['title'] ?></h3>
                </td>
                <td><a class="btn btn-primary"  onclick="history.go(-1);" role="button">Back</a></td>
            </tr>
        </table>
        <hr class="my-4">
        <table>
            <tr>
                <td style="width: 250px;">
                    <?php
                    $url = base_url() . '/upload/' . $item['image'];
                    echo "<img  src=\"$url\" alt=\"your image\" style= \"width:250x;height:250px;margin-top:0px\"";
                    ?>
                </td>
                <td style="vertical-align: top;">
                    <p style="margin-top:10px;margin-left:10px"><?=$item['description']?></p>
                </td>
            </tr>
        </table>
    </div>
</div>