            <div class="col-xs-12">
                <table  class="table table-striped table-bordered dt-responsive nowrap"
                     cellspacing="0" width="100%">
                      <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                      <th class="text-center">رقم الام</th> 
                                      <th class="text-center">رقم الملف</th> 

                                </tr>
                                </thead>
                          <tbody class="text-center">
                                <?php  $x=1; foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                          <td><?php echo $record->mother_national_num; ?></td>
 <td><?php echo $record->file_num; ?></td>
   

                                            
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
                </table>
            </div>