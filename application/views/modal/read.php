<div class="modal fade" id="read_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Message</h4>
            </div>
            <div class="modal-body">
                <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Sender</td>
                        <td>:</td>
                        <td class="text-danger"><span class="sender_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><span class="subject_here"></span></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" readonly style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-primary" data-target="#reply_mail" data-toggle="modal" data-dismiss="modal"><i class="fa fa-reply"></i> Reply</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="read_admin_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Message</h4>
            </div>
            <?php echo form_open('messages/update'); ?>
            <input type="hidden" name="message_id" class="message_id">
            <div class="modal-body">
                <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Sender</td>
                        <td>:</td>
                        <td class="text-danger"><span class="sender_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Receipient</td>
                        <td>:</td>
                        <td class="text-danger"><span class="receipient_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><input type="text" name="subject" class="subject_here form-control"></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="read_sent_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Sent Message</h4>
            </div>
            <div class="modal-body">
                <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Receipient</td>
                        <td>:</td>
                        <td class="text-danger"><span class="receiver_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><span class="subject_here"></span></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" readonly style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="reply_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Reply Message</h4>
            </div>
            <div class="modal-body" style="font-size:1.2em">
                <?php echo form_open('inbox/send'); ?>
                <div class="form-group">
                    <label for="send_to">Send To:</label>
                    <font class="sender text-primary"></font>
                    <input type="hidden" class="send_to" name="send_to">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control reply_subject" name="subject">
                </div>   
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" cols="40" rows="10" class="form-control" placeholder="Your Message Here" style="resize: none;"></textarea>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="send" value="1" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>