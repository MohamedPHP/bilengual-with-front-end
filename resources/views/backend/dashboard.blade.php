@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-server"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Users</p>
                                        {{ count($users) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Levels</p>
                                        {{ count($levels) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-calendar"></i> Last day
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-pulse"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Quizes</p>
                                        {{ count($quizes) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-twitter-alt"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Questions</p>
                                        27000
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h2 class="text-center">Front End Featuries</h2>
                <div class="col-md-6" style="border-right: 1px solid #ccc;">
                    <h3>Home Page</h3>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Download Links</h3>
                      </div>
                      <div class="panel-body">
                          <form>
                              <div class="form-group">
                                  <label>Android Link</label>
                                  <input type="text" class="form-control border-input" id="Android_Link" required>
                                  <p class="help-block">For Example: https://www.google.com</p>
                              </div>
                              <div class="form-group">
                                  <label>IOS Link</label>
                                  <input type="text" class="form-control border-input" id="IOS_Link" required>
                                  <p class="help-block">For Example: https://www.Appel.com</p>
                              </div>
                              <div class="btn-group btn-group-sm">
                                  <button type="submit" class="btn btn-primary btn-block">Add</button>
                              </div>
                          </form>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Seo Work Links</h3>
                      </div>
                      <div class="panel-body">
                          <form>
                              <div class="form-group">
                                  <label>Albfra Link</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Flater Link</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Albfra Link</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Flater Link</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="btn-group btn-group-sm">
                                  <button type="submit" class="btn btn-primary btn-block">Add</button>
                              </div>
                          </form>
                      </div>
                    </div>


                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">DETAILS</h3>
                      </div>
                      <div class="panel-body">
                          <form>
                              <div class="form-group">
                                  <label>Heading</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>DETAILS</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Privacy</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Sochial INTEGRATION</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="btn-group btn-group-sm">
                                  <button type="submit" class="btn btn-primary btn-block">Add</button>
                              </div>
                          </form>
                      </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <h3>About Us Page</h3>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Download Links</h3>
                      </div>
                      <div class="panel-body">
                          <form>
                              <div class="form-group">
                                  <label>Page Heading</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Small Heading</label>
                                  <input type="text" class="form-control border-input" id="" required>
                              </div>
                              <div class="form-group">
                                  <label>Link</label>
                                  <input type="text" class="form-control border-input" id="" required>
                                  <p class="help-block">For Example: https://www.Appel.com</p>
                              </div>
                              <div class="btn-group btn-group-sm">
                                  <button type="submit" class="btn btn-primary btn-block">Add</button>
                              </div>
                          </form>
                      </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Advantages</h3>
                        </div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" class="form-control border-input" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" class="form-control border-input" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE ITEM 1</label>
                                    <textarea name="name" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE ITEM 2</label>
                                    <textarea name="name" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE ITEM 3</label>
                                    <textarea name="name" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE ITEM 4</label>
                                    <textarea name="name" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Manager</h3>
                        </div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" class="form-control border-input" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>About The Manager</label>
                                    <textarea name="name" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Manager Name</label>
                                    <input type="text" class="form-control border-input" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>Manager img</label>
                                    <input type="file" class="form-control border-input" id="" required>
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
