package connection;

import java.sql.*;

public class Database {
	private Connection conn;

	public Database() {
		conn = null;
	}

	public boolean openConnection(String userName, String password) {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager.getConnection("jdbc:mysql://localhost/krusty", userName, password);
		} catch (SQLException e) {
			System.err.println(e);
			e.printStackTrace();
			return false;
		} catch (ClassNotFoundException e) {
			System.err.println(e);
			e.printStackTrace();
			return false;
		}
		return true;
	}

	
	public void closeConnection() {
		try {
			if (conn != null)
				conn.close();
		} catch (SQLException e) {
			System.out.println(e);
			e.printStackTrace();
		}
		conn = null;
		System.err.println("Database connection closed.");
	}


	public boolean isConnected() {
		return conn != null;
	}
}
