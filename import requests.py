import requests

# Steam Web API'sine istek göndermek için kullanacağımız URL
url = 'https://api.steampowered.com/ISteamApps/GetAppList/v2/'

# İstek gönderme ve sonucu almak için requests kütüphanesini kullanıyoruz
response = requests.get(url)

# İstek başarılıysa, Steam Pazarı'ndaki oyunların isimleri response.json()['applist']['apps'] içinde bulunur
if response.status_code == 200:
    games = response.json()['applist']['apps']
    game_names = [game['name'] for game in games] # Oyun isimlerini bir listeye ekliyoruz
    print(game_names)
else:
    print('İstek başarısız oldu')