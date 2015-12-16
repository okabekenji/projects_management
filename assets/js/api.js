function send(params, url, callback)
{

  $.ajax({
    type: "POST",
    cache: false,
    scriptCharset: 'utf-8',
    dataType: 'json',
    url: url,
    data: params,
    success: function(data){
      callback(data);
    }
  });
}
