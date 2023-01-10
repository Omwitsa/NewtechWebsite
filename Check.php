docker build --pull -t omwitsa/newtech_website .
docker run --pull=always -dit --name newtech-website -p 80:80 omwitsa/newtech_website
