<?

	/************************************************************************************************
	*
	* PHP ���� ���� �ҽ�
	* 
	* ���ް� �� returnURL�� ����� �� ����.
	* sendMsg�� sendDate urlencode()�� ����Ͽ� �Ѱ��ֽñ� �ٶ��ϴ�.
	* file_get_contents() �Լ� �̿�� ������ �߻��Ͻô� ���
    * php.ini ���Ͽ��� allow_url_fopen ���� On ���� �Ǿ� �ִ��� Ȯ�����ּ���.
	*
	* allow_url_fopen = On�� �ƴѰ�� socket �Ǵ� html������ �̿��Ͽ� �����Ͽ� �ֽñ� �ٶ��ϴ�.
	*
	* ���۰�� ����ڵ� | ����޼��� | �����Ǽ� | ���аǼ� | �����Ǽ� | ��������Ǻ�����^������ | ��������Ǻ�����^������ ... ���·� ���
	* ���۰���ڵ�� ����Ʈ | �� �����Ͽ� ����Ͻø� �˴ϴ�.
	* 
	* �ʼ� �Է� ������ �ݵ�� �Է��Ͻñ� �ٶ��ϴ�. 
	* �׽�Ʈ ���� �� ���������� ���ؼ��� ������ �� �����Ͻñ� �ٶ��ϴ�.
	* ����ڵ�ǥ�� �����Ͽ� �����Ͻñ� �ٶ��ϴ�.
	*
	* charset �� EUC-KR �� ��� http://www.sms9.co.kr/authSendApi/authSendApi.php
	* charset �� UTF-8 �� ��� http://www.sms9.co.kr/authSendApi/authSendApi_UTF8.php 
	*
	* ���ۺ�Ź�帳�ϴ�.
	*
	* ������Ǵ� 02-3430-5074 ���������� ��Ź�帳�ϴ�.
	*
	****************************************************************************************************/
	
	//����ó�� �Լ� ����
	function SendMsgApiToUrl($sendUrl){

		$sendResult = file_get_contents($sendUrl);

		$sendResult = trim($sendResult);

		return $sendResult;
	}

	//��������
	$sUserid = "petdol";										//9������ ������ �߱޹��� ȸ������ ID
	$authKey = "31NGWZPauefWqkkxI7PrUX7QpOcOEfTB";						//9������ ����>������û �� �߱޹��� ȸ���� ��������Ű
	$sendMsg = urlencode("test123");										//������ �޼��� ����
	$destNum = "01054405414";													//�޴º� �޴�����ȣ. �뷮���۽� | �� �����Ͽ� �Է� ��) 01000000000|01000000001|01000000002...
	$callNum = "07052080907";													//�����º� ��ȭ��ȣ. ������,����� Ư����ȣ �� ��ȭ��ȣ���°� �ƴ� ��ȣ�� ����� �� �����Ƿ� �����Ͻñ� �ٶ��ϴ�.(������ȣ�Է�)
	$sMode = "Test";												//�׽�Ʈ���۰� ���������� �����ϴ� ����. Test(�׽�Ʈ����) �Ǵ� Real(������). �⺻�� : Test
	$sendDate = date("Y-m-d H:i:s");								//��������
	$sType = "SMS";													//ª������ �Ǵ� �幮���ڸ� �����ϴ� ����. SMS(�F������) �Ǵ� LMS(�幮����). �⺻�� : SMS
	$customVal = "";												//����� ���� ����. ������^��|������^�� ���·� ����.
	$sSubject = urlencode("");										//sType�� (�幮����)LMS�� ��츸 ���. �޼��������̸�. ���� ������ "�幮�޼���"�� ����

	$sendUrl = "http://www.sms9.co.kr/authSendApi/authSendApi.php";
	$sendParam = "?sUserid=".$sUserid."&authKey=".$authKey."&sendMsg=".$sendMsg."&destNum=".$destNum."&callNum=".$callNum."&sMode=".$sMode;

	$sendParamURL = $sendUrl.$sendParam;

	$sendResult = SendMsgApiToUrl($sendParamURL);


	echo $sendResult; 

?>