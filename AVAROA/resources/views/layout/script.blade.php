{{-- =========================================================
   GLOBAL LIBRARIES
========================================================= --}}
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.sparkline2.1.2.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>

<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>


{{-- =========================================================
   GOOGLE MAPS (OPTIONAL)
========================================================= --}}
<script async defer
src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places,marker&v=weekly">
</script>


{{-- =========================================================
   SWEETALERT
========================================================= --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- =========================================================
   TEMPLATE CORE
========================================================= --}}
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>



{{-- =========================================================
   GLOBAL AJAX SYSTEM
========================================================= --}}
<script>
document.addEventListener("DOMContentLoaded", function(){

    const meta = document.querySelector('meta[name="csrf-token"]');
    const csrf = meta ? meta.getAttribute('content') : '';

    /* =========================
       GLOBAL FORM SUBMIT
    ========================== */
    document.addEventListener("submit", async function(e){

        const form = e.target.closest("form.ajax-form");
        if(!form) return;

        e.preventDefault();

        try{
            const res = await fetch(form.action,{
                method: form.method || "POST",
                body: new FormData(form),
                headers:{
                    "X-CSRF-TOKEN": csrf,
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json"
                },
                credentials: "include" // 🔥 FIX
            });

            const data = await res.json();

            if(res.ok){
                Swal.fire("Success", data.message || "Done", "success");
                if(data.redirect){
                    window.location.href = data.redirect;
                }else{
                    location.reload();
                }
            }else{
                Swal.fire("Error", data.message || "Error", "error");
            }

        }catch{
            Swal.fire("Error","Server not responding","error");
        }

    });


    /* =========================
       DELETE
    ========================== */
    document.addEventListener("click", async function(e){

        const btn = e.target.closest(".btn-delete-ajax");
        if(!btn) return;

        e.preventDefault();

        if(!confirm("Delete this item?")) return;

        const res = await fetch(btn.dataset.url,{
            method:"DELETE",
            headers:{
                "X-CSRF-TOKEN": csrf,
                "Accept":"application/json"
            },
            credentials:"include" // 🔥 FIX
        });

        if(res.ok){
            location.reload();
        }

    });

});
</script>



{{-- =========================================================
   PAGE LEVEL SCRIPTS
========================================================= --}}
@stack('scripts')
