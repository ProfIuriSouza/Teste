$TTL    86400
@    IN    SOA    admin.iflearning.com.    root.iflearning.com. (

           2022081101    ;Serial
           3600        ; Refrsh
           720        ; Retry
           1209600        ; Expire
           86400 ) ; Negative Cache TTL
;

          IN    NS        admin.iflearning.com.
          IN    A         192.168.0.159
admin     IN    A         192.168.0.159
www       IN    CNAME     iflearning.com.
