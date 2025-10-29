@extends('app')

@section('content')
    <div class="shadow mb-5 bg-body-tertiary rounded p-4 mt-4" style="margin-left: 10%; margin-right: 10%">
        <table class="table text-start table-bordered table-hover rounded" style="width: 100%" id="studentTable">
            <thead>
                <tr class="text-white">
                    <th scope="col" class="text-center text-capitalize">nim</th>
                    <th scope="col" class="text-center text-capitalize">name</th>
                    <th scope="col" class="text-center text-capitalize">age</th>
                    <th scope="col" class="text-center text-capitalize">address</th>
                    <th scope="col" class="text-center text-capitalize">major</th>
                </tr>
            </thead>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            createStudentTable();

            window.Echo.channel('student-data-event')
                .listen('StudentDataEvent', (e) => {
                    console.log(`${e.data}, Successfully deleted.`);
                    $('#studentTable').DataTable().ajax.reload(); //refresh data ketika terjadi event
                });
        });

        function createStudentTable() {
            $('#studentTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                ajax: '{{ route('fetch.student.data') }}',
                columns: [{
                        data: "nim",
                        name: "nim"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "age",
                        name: "age"
                    },
                    {
                        data: "address",
                        name: "address"
                    },
                    {
                        data: "major",
                        name: "major"
                    },
                ]
            });
        }
    </script>
@endsection
