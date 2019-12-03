import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
 
public class OpenApi {
    public static void main(String[] args) {
        BufferedReader br = null;
        try{            
            String urlstr = "http://openapi.airkorea.or.kr/"
                    + "openapi/services/rest/ArpltnInforInqireSvc/getMsrstnAcctoRltmMesureDnsty"
                    + "?sidoName=서울&searchCondition=Daily&&pageNo=1&numOfRows=10&ServiceKey=xIpTf5EjTDUZqXzjiOIMxcEhgtzMWjkbBVuJZHW1bZKSvjb5FVVUlJA5wzZG2rf42QTGyKiG8Q2o7%2B%2F9TK9Xfw%3D%3D&ver=1.3";
            URL url = new URL(urlstr);
            HttpURLConnection urlconnection = (HttpURLConnection) url.openConnection();
            urlconnection.setRequestMethod("GET");
            br = new BufferedReader(new InputStreamReader(urlconnection.getInputStream(),"UTF-8"));
            String result = "";
            String line;
            while((line = br.readLine()) != null) {
                result = result + line + "\n";
            }
            System.out.println(result);
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
    }
}
