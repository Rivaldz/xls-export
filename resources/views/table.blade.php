<div>
    <button onclick="exportTableToExcel('tblData')" class="btn btn-info">Export Data</button>
</div>
<table id="tblData" class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tangal</th>
            <th scope="col">No. Resep</th>
            <th scope="col">No. Reg</th>
            <th scope="col">No. RM</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Pasien</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <div hidden>
            {{$show_result = 0}}
        </div>
        @foreach ($data as $k => $item)
        <tr>
            <td>{{$k+1}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->nomor_resep}}</td>
            <td>{{$item->no_registrasi_pasien}}</td>
            <td>{{$item->no_rm_pasien}}</td>
            <td>{{$item->nama_pasien}}</td>
            <td>{{$item->jenis_pasien}}</td>
            <td>{{$item->total}}</td>
        </tr>
        <div hidden>
            {{$result = $show_result + $item->total}}
            {{$show_result = $result}}
        </div>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>Jumlah Total:</th>
            <th scope="col">
                {{$show_result}}
            </th>

        </tr>
    </tbody>

</table>
<script>
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        filename = filename ? filename + '.xls' : 'excel_data.xls';

        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            downloadLink.download = filename;

            downloadLink.click();
        }
    }
</script>