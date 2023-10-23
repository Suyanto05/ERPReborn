@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Summary Report</label>
        </div>
      </div>

      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">

          <div class="row">
            <div class="col-12 ShowDocumentList" style="font-weight: bold;">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td style="padding-top: 5px;"><label>Budget Code</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Transaction Number</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td style="padding-top: 5px;"><label>Date</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Requester</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Beneficiary</label></td>
                            <td>:</td>
                            <td></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 ShowDocumentList">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap TableListDocumentDetail" id="TableListDocumentDetail">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ADVANCE PURPOSE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT ID</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DESCRIPTION & SPECIFICATIONS</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL ADVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">GRAND TOTAL ADVANCE</th>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format(0,2) }}</span></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@endsection