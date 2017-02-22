function getSupplier(ruc){
            if(ruc.length === undefined || ruc.lenght == 0) return false;
            
            $.get("{{ url('/purchase/getsupplier') }}/"+ruc, function(data){
                var response = JSON.parse(JSON.stringify(data)); 
                $('input[id=proveedor_nombre]').val(response.name);
                $('input[id=proveedor_direccion]').val(response.address);
            });
        }
        var rows = 0;
        function addRow(data){
            rows = rows + 1;
            var html = '<tr data-product-id="'+rows+'">';
            html += '<th data-product="id">'+rows+'</th>';
            html += '<td data-product="code">'+data.code+'</td>';
            html += '<td data-product="description">'+data.description+'</td>';
            html += '<td data-product="brand">'+data.brand+'</td>';
            html += '<td class="text-center" data-product="quantity"><input type="number" min="0" class="form-control form-control-sm text-center" value="1"></td>';
            html += '<td data-product="prize"><input type="text" value="0.00" class="text-right form-control form-control-sm"></td>';
            html += '<td data-product="total-prize" class="text-right"><input type="text" value="0.00" class="text-right form-control form-control-sm"></td>';
            html += '<td class="text-center"><a onClick="deleteRow(\''+rows+'\')"><i class="fa fa-close"></i></a></td>';
            html += '</tr>';
            
            $('#products').append(html);
            updateTable();
        }
        
        function updateTable(){
            var total = 0;
            $('td[data-product=quantity]').find('input').each(function(){
                total = total + parseInt($(this).val());
            });
            $('#total-items').html(total);
            
            $('#products').find('tr').each(function(){
                var c = $(this).children('td[data-product=quantity]').children().val();
                var p = $(this).children('td[data-product=prize]').children().val();
                var m1 = p.lenght !== 'undefined' && p > 0 ? p : 0;
                var m2 = c.lenght !== 'undefined' && c > 0 ? c : 0;
                
                var t = Math.round(parseFloat(m1)*parseInt(m2)*100)/100;
                $(this).children('td[data-product=total-prize]').children().val(t);
            });
            
            var total_prize = 0;
            $('td[data-product=total-prize]').find('input').each(function(){
                var v = $(this).val();
                var p = v.lenght !== 'undefined' && v > 0 ? v : 0;
                total_prize = Math.round((total_prize + parseFloat(v))*100)/100;
            });
            $('#total-prize').html(total_prize);
            
            updateIgv(total_prize);
        }
        
        function updateIgv(total_prize = 0){
            var with_igv = $('select[name=igv] option:selected').val();
            if(with_igv > 0){
                var sub = Math.round((100*total_prize/118) * 100) / 100;
                var igv = Math.round((total_prize - sub) * 100) / 100;
                $('#total').html(total_prize);
                $('#total-sub').html(sub);
                $('#total-igv').html(igv);
            }else{
                var tot = Math.round((1.18*total_prize) * 100) / 100;
                var igv = Math.round((tot - total_prize) * 100) / 100;
                $('#total').html(tot);
                $('#total-sub').html(total_prize);
                $('#total-igv').html(igv);
            }
        }
        
        function deleteRow(id){
            $('tr[data-product-id='+id+']').remove();
            updateTable();
        }
        
        $(function(){
            $(document).keypress(function(e) {
                if(e.which == 13) {
                    e.preventDefault();
                }
            });
            
            var suppliers = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: {
                        url: "{{ url('/purchase/get/suppliers')}}",
                        cache: false
                    }
            });
            var supplier_search = $('#proveedor_ruc').typeahead(null, {
                name: 'supplier',
                source: suppliers,
            }).on('typeahead:selected', function(obj, datum) {  
                getSupplier(datum);
            });
            
             $('.datepicker').datepicker({
                format: 'dd/mm/yyyy'
             });
        
            $('select[name=igv]').on('change', function(){
                updateIgv(parseFloat($('#total-prize').html()))
            });
            
            $('#products').on('change', 'tr > td > input', updateTable);
            var items = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: "{{ url('/purchase/get/items')}}?term=%QUERY",
                    wildcard: '%QUERY'
                }
            });
            var item_search = $('#search-item > .typeahead').typeahead({
                minLength: 3,
                highlight: true
            }, 
            {
                displayKey: 'product',
                name: 'items',
                source: items,
            }).on('typeahead:selected', function(obj, datum) { 
                item_search.typeahead('val','');
                addRow(datum);
            }).on('keyup', function(e){
                if(e.which == 13) {
                    $(".tt-dataset > .tt-suggestion:first-child").trigger('click');
                }    
            });
        });