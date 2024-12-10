$TTL    86400
@    IN    SOA    admin.usuariolocal.com.    root.usuariolocal.com. (

           2022081101    ;Serial
           3600        ; Refrsh
           720        ; Retry
           1209600        ; Expire
           86400 ) ; Negative Cache TTL
;

          IN    NS        admin.usuariolocal.com.
          IN    A         192.168.0.111
admin     IN    A         192.168.0.111
www       IN    CNAME     usuariolocal.com.
