<div class="jumbotron">
    <div class="container">
        <div class="menu-bar">
            <table>
                <tr>
                    <td style="width:90%">
                        <h3 id="add_action_h3">Manage</h3>
                    </td>
                    <td id="back_btn" onclick="history.go(-1);"> <a  class="btn btn-secondary btn-sm active" role="button" aria-pressed="true" style="margin:5px;">Back</a> </td>
                    <td id="show_btn" onclick="prevF()"> <a href="<?=base_url("/admin/showpreview")?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true" style="margin:5px;">Show</a> </td>
                </tr>
            </table>
        </div>
        <hr class="my-4">
        <form action="<?= site_url('admin/add') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name='pre' value="<?=$pre?>" >
            <table>
                <tr class="form-group">
                    <td style="width: 30%;">
                        <h6 id="title-h5">Title:</h6>
                    </td>
                    <td>
                        <input id="titleid" type="text" name="title" style="width: 300px;" value="Title">
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
                        <textarea id="descriptionid" name="description" rows="4" cols="70%" style="resize: horizontal;">Description</textarea>
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
                        <img id="blah" src="https://st.quantrimang.com/photos/image/2017/04/08/anh-dai-dien-FB-200.jpg" alt="your image" style="width:150px;height:150px;margin-top:5px" />
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
                        <select name="status" id="statusid" style="margin-top: -5px; width:100px">
                            <option value="Enabled">Enabled</option>
                            <option value="Disabled">Disabled</option>
                        </select>
                    </td>
                </tr>
                <tr class="form-group">
                    <td style="width: 30%" valign="top">
                        <h6 id="status-h6" style="text-align: left;vertical-align: top;margin-top:-3px"></h6>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-dark" style="margin-top:5px">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>