<div class="modal fade" id="search_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Search Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('inbox/search');?>   
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Enter Keyword..." name="keyword">
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" value="1" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="search_admin_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Search Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('messages/search');?>   
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Enter keyword of sender, subject or message..." name="keyword">
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" value="1" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sent_search_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Search Message</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('sentitems/search');?>   
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Enter Keyword..." name="keyword">
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" value="1" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user_search_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search"></i> Search User</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('users/search');?>   
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Enter Keyword..." name="keyword">
                </div>                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" value="1" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
        </div>
    </div>
</div>