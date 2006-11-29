
                    <div id="more_info">

                    <p><?= _('Tell us the format of your work') . ':' ;?> 

                    <select name="info_format" id="info_format" onchange="modify(this)">
                    <option value=""><?= _('Other') ?></option>
                    <option value="Sound"><?= _('Audio') ?></option>
                    <option value="MovingImage"><?= _('Video') ?></option>
                    <option value="StillImage"><?= _('Image') ?></option>
                    <option value="Text"><?= _('Text') ?></option>
                    <option value="InteractiveResource"><?= _('Interactive') ?>
                    </option>
                    </select></p>

                    <table>
                    <tr>
                        <td class="header">
                            <label for="info_title">
                            <?= _('Title of Work') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_title" id="info_title" onchange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_attribute_to_name">
                            <?= _('Attribute to Name') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_attribute_to_name" value="" id="info_attribute_to_name" onchange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_attribute_to_url">
                            <?= _('Attribute to URL') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_attribute_to_url" value="" id="info_attribute_to_url" onchange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_source_work_url">
                            <a href="#" <?= print_tooltip_js(_('A work another is derived from.'), 'http://a2.creativecommons.org/jargon/source_work')?>><?= _('Source Work') ?></a> <?= _('URL') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_source_work_url" value="" id="info_source_work_url" onchange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_more_permissions_url"><?= _('More Permissions URL') ?>&nbsp;</label>
                        </td>
                        <td>
                            <input type="text" name="info_more_permissions_url" value="" id="info_more_permissions_url" onchange="modify(this)" />
                        </td>
                    </tr>
                    </table>
                    </div>



