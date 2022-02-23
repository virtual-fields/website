@extends('admin.layout.leftbar')
@section('dashboard')
          <div class="row">
            <div class="col-sm-12">

              @if (Session::has('msg'))
              <div class="row"><div class="col-sm-12">
              <div class="alert alert-success">{{ _tr(Session::get('msg')) }}</div>
              </div></div>
              @endif

              
              
              <div class="panel panel-default">
      
                <div class="panel-heading">
                  <h3 class="panel-title">{{ _tr('All Pages') }}</h3>
                </div>
        
                <div class="panel-body">
                   
                    <form method="GET" action="{{ route('all-pages') }}" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="row">     
                    <div class="col-sm-2">
                    <div class="form-group">
                    <label>{{ _tr('Status') }}</label>
                       <select name="status" class="form-control">
                          <option value="1" <?php if(isset($_GET['status'])){ selected ('1',$_GET['status']); } ?>>Active</option>
                          <option value="0" <?php if(isset($_GET['status'])){ selected ('0',$_GET['status']); } ?>>Inactive</option>
                       </select>

                     </div>
                     </div>
                       <div class="col-sm-8">
                       <div class="form-group">
                    <label>{{ _tr('Title/Description') }}</label>
                    <input type="text" placeholder="{{ _tr('Title/Description') }}" class="form-control" name="s" value="<?php if(isset($_GET['s'])){ echo $_GET['s']; } ?>">
                     </div>
                       </div>
                    <div class="col-sm-2">
                     <div class="form-group">
                        <label></label><br>
                    <button type="submit" class="btn btn-default" id="submitButton">{{ _tr('Search') }}</button>
					<?php if(isset($_GET['s']) || isset($_GET['status'])) { ?>
                        <a href="{{ route('all-pages') }}" class="btn btn-xs btn-danger">{{ _tr('Clear') }}</a>
                      <?php } ?>
                    </div>
                    </div>
                  </div>
                    </form> 
                  
				   <form name="apply_action" id="apply_action" action="{{ route('bulk-delete') }}" method="POST">
				   <div class="apply_action">
				   <input type="button" class="btn btn-primary" name="submit_bulk_delete" id="submit_bulk_delete" value="{{ _tr('Bulk Delete') }}">
				   <input type="hidden" name="table" value="cms_pages">
				   <input type="hidden" name="grid_name" value="Page">
				   <input name="_token" type="hidden" value="{{ csrf_token() }}">
				   </div>
                   <table class="table table-bordered table-striped ar-table"> 
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="select_all" id="select_all" value="1" class="select_all"></th>
                        <th>{{ _tr('SL') }}</th>
                        <th>{{ _tr('Title') }}</th>
                        <th>{{ _tr('Description') }}</th>
                        <th style="width:100px;">{{ _tr('Date') }}</th>
                        <th style="width:112px;">{{ _tr('Status') }}</th>
                        <th style="width:80px;">{{ _tr('Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($all_pages) && count($all_pages) > 0)
                      {
                        $sl=1;
                        foreach($all_pages as $k=>$v)
                        {
                          ?>
                          <tr>
							<td style="width:15px;"><input type="checkbox" name="ids[]" id="ids_<?php echo $v->ID; ?>" value="<?php echo $v->ID; ?>" class="select_each"></td>
                            <td><?php echo $sl; ?></td>
                            <td><a href="<?php echo page_url($v->slug); ?>" target="_blank"><?php echo $v->title; ?></a></td>
                            <td><?php echo str_limit(strip_tags($v->description),150,'...'); ?></td>
                            <td><?php echo $v->publish_date; ?></td>
                            <td>
                              <select class="ajx_status form-control" name="cms_pages" id="status<?php echo $v->ID; ?>" data="<?php echo $v->ID; ?>" <?php if($v->status == 0) { ?> style="border-color: red;" <?php } ?>>
                                  <option value="1" <?php if($v->status == 1) { ?> selected="selected" <?php } ?>>Active</option>
                                  <option value="0" <?php if($v->status == 0) { ?> selected="selected" <?php } ?>>Inactive</option>
                                </select>
                            </td>
                            <td>
                              <a href="{{ route('add-page') }}/{{ $v->ID }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                              <a href="{{ route('delete-page') }}/{{ $v->ID }}" class="btn btn-danger btn-xs" onclick="return confirm('<?php echo _tr('Sure To Delete This Page ?'); ?>');"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                          </tr>
                          <?php
                          $sl++;
                        }
                      }else{
                        ?>
                        <tr>
                          <td colspan="7" style="text-align: center;">{{ _tr('No Item Found!') }}</td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                   </table>
                   </form>
				   <?php if(!empty($all_pages) && count($all_pages) > 0) { echo $all_pages->links(); } ?>
                </div>
              </div>

            </div>
          </div>

    
@stop