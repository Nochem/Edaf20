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

	//Add customer
	public ResultSet addCustomer(String name, String address ) {
		String str = "insert into Customers (Address, Name) values ("+address+", "+name+");";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
		
		
	//Add recipe. This will have to be called for each ingredient that is part of the recipe.
	public ResultSet addRecipe(String name, String ingredient, String unit, String amount ) {
		String str = "insert into Cookies(CookieName, IngredientName, Amount, Unit) values ("+name+", "+ingredient+", "+unit+", "+amount+");";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//Add ingredient
	public ResultSet addNewIngredient(String name) {
		String str = "insert into Ingredients(IngredientName) values ("+name+");";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//Restock ingredients. Here we must first query the DB to collect the current stored quantity.
	public ResultSet restockIngredients(String name) {}
	
	//Produce pallet
	
	//List customers
	public ResultSet showCustomers() {
		String str = "select * from Customers";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//List orders
	public ResultSet showOrders() {
		String str = "select OrderID, DeliveryDate, Name, Address from Orders join Customers using (CustomerID) order by DeliveryDate asc;";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//List orders per specific customers
	public ResultSet showOrdersOfCustomer(String name) {
		String str = "select OrderID, DeliveryDate, Name, Address from Orders join Customers using (CustomerID) and Customer.name='"+name+"' order by DeliveryDate asc;";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//List order details per order
	public ResultSet showOrderDetails(String orderID) {
		String str = "select CookieName, QuantityOrdered, ";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}
	
	//List ingredient storage
	
	//List Cookies
	
	//Show recipe
	
	//Block pallet

	
	
	public ResultSet getCookies(String name, String table) {
		String str = "select distinct "+name+" from "+table+";";
		ResultSet rs = null;
		try {
			Statement statement = conn.createStatement();
			rs = statement.executeQuery(str);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return rs;
	}

}
