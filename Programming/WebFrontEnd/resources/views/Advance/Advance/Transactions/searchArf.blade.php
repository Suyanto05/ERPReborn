<!--|----------------------------------------------------------------------------------|
    |                             Function My Project Code                             |
    |----------------------------------------------------------------------------------|-->
    <div id="searchArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><label for=""> Choose Currency</label></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <table>
                            <tr>
                              <td><label>No Trans</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td><label>Site Code</label></td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            </table>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Trano</th>
                                                <th>Project ID</th>
                                                <th>Project Name</th>
                                                <th>Site Code</th>
                                                <th>Side Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td><span class="tag tag-success tombolProject"><p id="kata1"> Approved</p></span></td>
                                                <td><p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                                <td><p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                                <td><p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                                <td><p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->