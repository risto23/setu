<?php 
                      $login=$_SESSION['user'];
                                 if($login==6)
                                 {
                       ?>
                        <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-book" title="Penulis"> </i>
                        </span>
                        <select name="konfirmasi" class="form-control">
                            <option value="konfirmasi">Konfirmasi</option>
                            <option value="konfirmasi">Pending</option>
                          </select>
                      </div>
                      <?php 
                      } ?>