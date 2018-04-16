package connection;

public class DatabaseTest {
	public static void main(String[]args) {
		Database db = new Database();
		db.openConnection("Noch", "1234");
		get("Cookiename", "Cookies");
	}
}
