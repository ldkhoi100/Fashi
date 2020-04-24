{{-- Model --}}
@include('admin.products.detail')

<!-- Footer -->
<footer class="sticky-footer bg-white" style="margin-top: auto">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">After logging out, you need to log in again to access the management page</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
{{--  <script src="js/jquery.pjax.js"></script>  --}}
<script src="sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="sb-admin-2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="sb-admin-2/vendor/chart.js/Chart.min.js"></script>

<script src="sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="sb-admin-2/js/demo/datatables-demo.js"></script>
<script src="js/toastr.min.js"></script>
<!-- Back to top button -->
<script src="js/back-to-top.js"></script>

@stack('ckeditor-js')
@stack('chart-js')
@stack('show-ajax')
@stack('select2-js')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            $("#btn-submit").attr("disabled", true);
		  $("#btn-submit").addClass('button-clicked');
            return true;
        });
        $("#my-form2").submit(function (e) {
            $("#btn-submit2").attr("disabled", true);
		  $("#btn-submit2").addClass('button-clicked');
            return true;
        });
    });
</script>

<script>
    //Image onchange
    function readURL(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

    function readURL1(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom1');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

    //Image onchange
    function readURL2(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom2');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

    //Image onchange
    function readURL3(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom3');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

    //Image onchange
    function readURL4(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom4');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }

</script>

</body>

</html>