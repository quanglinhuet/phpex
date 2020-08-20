<style>
    .right {
        float: right;
        padding-top: 15px;
    }

    .left {
        float: left;
        padding-top: 15px;
    }

    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bg {
        /* The image used */
        background-color: #e9ecef;
        /* Full height */
        height: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .navbar {
        margin-bottom: 0px;
    }

    .jumbotron {
        margin-bottom: 0px;
    }
</style>

<div class="container">
    <div class="left">
        <h1>Manage</h1>
    </div>
    <div class="right"><a class="btn btn-primary btn-lg" href="<?=base_url("/admin/add")?>" role="button">Add</a></div>
</div>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <hr class="my-h4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;vertical-align:middle" , width="100px">ID</th>
                    <th scope="col" style="text-align: center;vertical-align:middle" , width="120px">Thumb</th>
                    <th scope="col" style="text-align: center;vertical-align:middle" , width="400ps">Title</th>
                    <th scope="col" style="text-align: center;vertical-align:middle">Status</th>
                    <th scope="col" style="text-align: center;vertical-align:middle">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entryshow as $key => $item) { ?>
                    <tr id="itemid_<?php $item['id'] ?>">
                        <th scope="row" style="text-align: center;vertical-align:middle"> <?= $item['id'] ?></th>
                        <td>
                            <?php
                            $url = base_url() . '/upload/' . $item['image'];
                            echo "<img  src=\"$url\" alt=\"your image\" style=\"width:90px;height:90px;margin-top:0px\"";
                            ?>
                        </td>
                        <td><?= $item['title'] ?></td>
                        <td style="text-align: center;vertical-align:middle"><?= $item['status'] ?></td>
                        <td style="text-align: center;vertical-align:middle">
                            <a href="admin/show/<?= $item['id'] ?>">Show</a>
                            <span>|</span>
                            <a href="admin/edit/<?= $item['id'] ?>">Edit</a>
                            <span>|</span>
                            <a href="admin/delete/<?= $item['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
            function myFunction() {
                document.getElementById("entry-form").submit();
            }
        </script>
        <table style="text-align:center;">
            <tr>
                <form id="entry-form" action="<?=base_url("/pages")?>" method="post">
                    <td style="width: 30%;">

                        <label for="entry">Number of rows display</label>
                        <select onchange="submitck()" name="entry" ID="myEntry" style="margin-left:5px">
                            <OPTION value="5" <?php
                                                if ($et == '5') echo 'selected';
                                                ?>>5</OPTION>
                            <OPTION value="10" <?php
                                                if ($et == '10') echo 'selected';
                                                ?>>10</OPTION>
                            <OPTION value="50" <?php
                                                if ($et == '50') echo 'selected';
                                                ?>>50</OPTION>
                            <OPTION value="10000000" <?php
                                                        if ($et == '10000000') echo 'selected';
                                                        ?>>All</OPTION>
                        </select>
                    </td>
                    <td style="text-align:center;">
                        <nav style="margin-top: 10px;margin-left: 168px;">
                            <?= //$pager->makeLinks($page=2,$perPage=7,$total=100,$template='page-l',$segment = 0,$group='group')
                                $pager->links('group', 'page-l');
                            ?>
                        </nav>
                    </td>
                </form>
            </tr>
        </table>
    </div>
</div>