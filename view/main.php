

<div class="container">
		<span onclick="showContent('/view/z1.php')" class="btn">Запрос 1</span>	 <span onclick="showContent('/view/z2.php')" class="btn">Запрос 2</span>	<span onclick="showContent('/view/z3.php')" class="btn">Запрос 1</span>	

	  	 <div id="contentBody">  
			
    	</div>  
  
    <div id="loading" style="display: none">  
    Идет загрузка...  
    </div>  



	<table class="table  table-hover">
		<tr>
			<th>ФИО</th>
			<th>Логин</th>
			<th>Email</th>
			<th>Количество ордеров</th>
		</tr>
			<?foreach ($data['users'] as $user):?>
		<tr>
			<th>
				<?=$user['fio']?>
			</th>
			<th>
				<?=$user['username']?>
			</th>
			<th>
				<?=$user['email']?>
			</th>			
			<th>
				<?
					$tmp_data	=	$class_data->getRow('select * from orders where user_id="'.$user['id'].'"');
					if (!empty($tmp_data)) {
					echo count($tmp_data);
					}
					else {
						echo '0';
					}
				?>
			</th>			
		</tr>
			<?endforeach;?>
		
	</table>
</div>

<script>  
    function showContent(link) {  
  
        var cont = document.getElementById('contentBody');  
        var loading = document.getElementById('loading');  
  
        cont.innerHTML = loading.innerHTML;  
  
        var http = createRequestObject();  
        if( http )   
        {  
            http.open('get', link);  
            http.onreadystatechange = function ()   
            {  
                if(http.readyState == 4)   
                {  
                    cont.innerHTML = http.responseText;  
                }  
            }  
            http.send(null);      
        }  
        else   
        {  
            document.location = link;  
        }  
    }  
  
    // создание ajax объекта  
    function createRequestObject()   
    {  
        try { return new XMLHttpRequest() }  
        catch(e)   
        {  
            try { return new ActiveXObject('Msxml2.XMLHTTP') }  
            catch(e)   
            {  
                try { return new ActiveXObject('Microsoft.XMLHTTP') }  
                catch(e) { return null; }  
            }  
        }  
    }  
</script>  