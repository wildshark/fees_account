    <div class="modal fade ModalBilling" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Billing</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action='index.php'>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ref #</label>
                                <input type="text" name="ref" class="form-control" placeholder="Ref #">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Academic Year</label>
                                <input type="text" name="academic-year" class="form-control" placeholder="2020/2020">
                            </div>
                        </div> 
                        <div class="form-row">   
                            <div class="form-group col-md-12">
                                <label>Student Name</label>
                                <select id="inputState" name="student" class="form-control">
                                   <?=combo_student($student)?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Class</label>
                                <select id="inputState" name="class" class="form-control">
                                    <?= combo_class($class)?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Term</label>
                                <select id="inputState" name="term" class="form-control">
                                    <option value="1">1st Term</option>
                                    <option value="2">2nd Term</option>
                                    <option value="3">3rd Term</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="0.00">
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="_submit" value="add-bill" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="modal fade ModalPayment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fees Payment</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="yyyy-dd-mm">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ref #</label>
                                <input type="text" name="ref" class="form-control" placeholder="Ref #">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Academic Year</label>
                                <input type="text" name="academic-year" class="form-control" placeholder="2020/2021">
                            </div>
                        </div> 
                        <div class="form-row">   
                            <div class="form-group col-md-12">
                                <label>Student Name</label>
                                <select id="inputState" name="student" class="form-control">
                                    <?=combo_student($student)?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Payment Description">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Class</label>
                                <select id="inputState" name="class" class="form-control">
                                    <?= combo_class($class)?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Term</label>
                                <select id="inputState" name="term" class="form-control">
                                    <option value="1">1st Term</option>
                                    <option value="2">2nd Term</option>
                                    <option value="3">3rd Term</option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-row">    
                            <div class="form-group col-md-6">
                                <label>Payment Type</label>
                                <select id="inputState" name="payment-type" class="form-control">
                                    <option>Cash</option>
                                    <option>Bank</option>
                                    <option>Mobile Money</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Paid Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="_submit" value="add-payment" class="btn btn-primary">Save changes</button>
                        </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade ModalGrade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Grade</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Grade Name</label>
                                <input type="text" name="grade" class="form-control" placeholder="Grade">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="_submit" value="add-grade" class="btn btn-primary">Save changes</button>
                        </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade ModalPassword" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Password</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>New Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Grade">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="_submit" value="change-password" class="btn btn-primary">Save</button>
                        </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade ModalClass" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Class to Student</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index.php">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="yyyy-dd-mm">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Academic Year</label>
                                <input type="text" name="academic-year" class="form-control" placeholder="2020/2021">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Term</label>
                                <select id="inputState" name="term" class="form-control">
                                    <option value="1">1st Term</option>
                                    <option value="2">2nd Term</option>
                                    <option value="3">3rd Term</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-row">   
                            <div class="form-group col-md-12">
                                <label>Student Name</label>
                                <select id="inputState" name="student" class="form-control">
                                    <?=combo_student($student)?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Class</label>
                                <select id="inputState" name="class" class="form-control">
                                    <?= combo_class($class)?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Class Section</label>
                                <input type="text" name="class-section" class="form-control" placeholder="section">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Fees Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="0.00">
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="_submit" value="add-batch" class="btn btn-primary">Save changes</button>
                        </div> 
                    </form>   
                </div>
            </div>
        </div>
    </div> 