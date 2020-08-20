<style>
.jumbotron {
    margin-bottom:0px;
}
</style>

<div class="jumbotron" style="margin-bottom: 0px;">
    <div class="container">
        <div class="menu-bar">
            <table>
                <tr>
                    <td style="width:90%">
                        <h3 id="add_action_h3">Edit</h3>
                    </td>
                    <td id="back_btn" onclick="history.go(-1);"> <a  class="btn btn-secondary btn-sm active" role="button" aria-pressed="true" style="margin:5px;">Back</a> </td>
                    <td id="show_btn" onclick="prevF()"> <a href="/admin/showpreview" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" style="margin:5px;">Show</a> </td>
                </tr>
            </table>
        </div>
        <hr class="my-4">
        <form action="<?= site_url("admin/edit/").$item['id'] ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr><input id='idedit' type="hidden" name="id" value="<?= $item['id']?>"></tr>
                <tr class="form-group">
                    <td style="width: 30%;">
                        <h6 id="title-h5">Title:</h6>
                    </td>
                    <td>
                        <input id="titleid" type="text" name="title" style="width: 300px;" value="<?= $item['title']?>">
                    </td>
                </tr>
            </table>
            <hr class="my-4">
            <table>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="title-h6" style="text-align: left;vertical-align: top;">Description:</h6>
                    </td>
                    <td style="width: 70%">
                        <textarea id="descriptionid" name="description" rows="4" cols="70%" style="resize: horizontal;"><?= $item['description']?></textarea>
                    </td>
                </tr>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="image-h6" style="text-align: left;vertical-align: top;">Image:</h6>
                    </td>
                    <td style="width: 70%">
                        <input type="file" id="imageid" name="image" accept="image/*" onchange="readURL(this);">
                    </td>
                </tr>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="image-h6" style="text-align: left;vertical-align: top;"></h6>
                    </td>
                    <td>
                        <?php
                            $url = base_url() . '/upload/' . $item['image'];
                            echo"<img id=\"blah\" src=\"$url\" alt=\"your image\" style=\"width:150px;height:150px;margin-top:5px\" ";
                        ?>
                    </td>
                </tr>
            </table>
            <hr class="my-4">
            <table>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="status-h6" style="text-align: left;vertical-align: top;margin-top:-3px">Status:</h6>
                    </td>
                    <td>
                        <select name="status" id="statusid" style="margin-top: -5px; width:100px" >
                            <option value="Enabled" <?php  if ($item['status']=='Enabled') {
                                echo 'selected';
                            } ?>>
                                Enabled
                            </option>
                            <option value="Disabled" <?php  if ($item['status']=='Disabled') {
                                echo 'selected';
                            } ?>>
                                Disabled
                            </option>
                        </select>
                    </td>
                </tr>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="status-h6" style="text-align: left;vertical-align: top;margin-top:-3px"></h6>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-dark" style="margin-top:5px">Save</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>