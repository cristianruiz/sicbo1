<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CajaBoletaDAO
	 */
	public static function getCajaBoletaDAO(){
		return new CajaBoletaMySqlExtDAO();
	}

	/**
	 * @return CajaBonoDAO
	 */
	public static function getCajaBonoDAO(){
		return new CajaBonoMySqlExtDAO();
	}

	/**
	 * @return CajaDetalleboletaDAO
	 */
	public static function getCajaDetalleboletaDAO(){
		return new CajaDetalleboletaMySqlExtDAO();
	}

	/**
	 * @return CajaDetallebonoDAO
	 */
	public static function getCajaDetallebonoDAO(){
		return new CajaDetallebonoMySqlExtDAO();
	}

	/**
	 * @return CajaEstadocomprobanteDAO
	 */
	public static function getCajaEstadocomprobanteDAO(){
		return new CajaEstadocomprobanteMySqlExtDAO();
	}

	/**
	 * @return CajaPagochequesDAO
	 */
	public static function getCajaPagochequesDAO(){
		return new CajaPagochequesMySqlExtDAO();
	}

	/**
	 * @return CajaPagoefectivoDAO
	 */
	public static function getCajaPagoefectivoDAO(){
		return new CajaPagoefectivoMySqlExtDAO();
	}

	/**
	 * @return CajaPagotbankDAO
	 */
	public static function getCajaPagotbankDAO(){
		return new CajaPagotbankMySqlExtDAO();
	}

	/**
	 * @return CajaTipocomprobanteDAO
	 */
	public static function getCajaTipocomprobanteDAO(){
		return new CajaTipocomprobanteMySqlExtDAO();
	}

	/**
	 * @return HmDetallehonorariossicboDAO
	 */
	public static function getHmDetallehonorariossicboDAO(){
		return new HmDetallehonorariossicboMySqlExtDAO();
	}

	/**
	 * @return HmEstadohonorarioDAO
	 */
	public static function getHmEstadohonorarioDAO(){
		return new HmEstadohonorarioMySqlExtDAO();
	}

	/**
	 * @return HmHomocodigosformulasDAO
	 */
	public static function getHmHomocodigosformulasDAO(){
		return new HmHomocodigosformulasMySqlExtDAO();
	}

	/**
	 * @return HmHonorarioconsolidadoDAO
	 */
	public static function getHmHonorarioconsolidadoDAO(){
		return new HmHonorarioconsolidadoMySqlExtDAO();
	}

	/**
	 * @return HmHonorariossicboDAO
	 */
	public static function getHmHonorariossicboDAO(){
		return new HmHonorariossicboMySqlExtDAO();
	}

	/**
	 * @return HmPersonanaturalDAO
	 */
	public static function getHmPersonanaturalDAO(){
		return new HmPersonanaturalMySqlExtDAO();
	}

	/**
	 * @return HmSociedadDAO
	 */
	public static function getHmSociedadDAO(){
		return new HmSociedadMySqlExtDAO();
	}

	/**
	 * @return HmSociosmiembrosDAO
	 */
	public static function getHmSociosmiembrosDAO(){
		return new HmSociosmiembrosMySqlExtDAO();
	}

	/**
	 * @return MaeBancosDAO
	 */
	public static function getMaeBancosDAO(){
		return new MaeBancosMySqlExtDAO();
	}

	/**
	 * @return MaeCargosDAO
	 */
	public static function getMaeCargosDAO(){
		return new MaeCargosMySqlExtDAO();
	}

	/**
	 * @return MaeCiudadDAO
	 */
	public static function getMaeCiudadDAO(){
		return new MaeCiudadMySqlExtDAO();
	}

	/**
	 * @return MaeDepartamentoDAO
	 */
	public static function getMaeDepartamentoDAO(){
		return new MaeDepartamentoMySqlExtDAO();
	}

	/**
	 * @return MaeEntidadDAO
	 */
	public static function getMaeEntidadDAO(){
		return new MaeEntidadMySqlExtDAO();
	}

	/**
	 * @return MaeEspecialidadesmedicasDAO
	 */
	public static function getMaeEspecialidadesmedicasDAO(){
		return new MaeEspecialidadesmedicasMySqlExtDAO();
	}

	/**
	 * @return MaeFinanciadorDAO
	 */
	public static function getMaeFinanciadorDAO(){
		return new MaeFinanciadorMySqlExtDAO();
	}

	/**
	 * @return MaeInsumosDAO
	 */
	public static function getMaeInsumosDAO(){
		return new MaeInsumosMySqlExtDAO();
	}

	/**
	 * @return MaeMedicosDAO
	 */
	public static function getMaeMedicosDAO(){
		return new MaeMedicosMySqlExtDAO();
	}

	/**
	 * @return MaePacienteDAO
	 */
	public static function getMaePacienteDAO(){
		return new MaePacienteMySqlExtDAO();
	}

	/**
	 * @return MaePersonalDAO
	 */
	public static function getMaePersonalDAO(){
		return new MaePersonalMySqlExtDAO();
	}

	/**
	 * @return MaeRolesDAO
	 */
	public static function getMaeRolesDAO(){
		return new MaeRolesMySqlExtDAO();
	}

	/**
	 * @return MaeSeccionesDAO
	 */
	public static function getMaeSeccionesDAO(){
		return new MaeSeccionesMySqlExtDAO();
	}

	/**
	 * @return MaeServiciosDAO
	 */
	public static function getMaeServiciosDAO(){
		return new MaeServiciosMySqlExtDAO();
	}

	/**
	 * @return OaCargoDAO
	 */
	public static function getOaCargoDAO(){
		return new OaCargoMySqlExtDAO();
	}

	/**
	 * @return OaDetalleinsumosDAO
	 */
	public static function getOaDetalleinsumosDAO(){
		return new OaDetalleinsumosMySqlExtDAO();
	}

	/**
	 * @return OaDetalleserviciosDAO
	 */
	public static function getOaDetalleserviciosDAO(){
		return new OaDetalleserviciosMySqlExtDAO();
	}

	/**
	 * @return OaEstadoscargoDAO
	 */
	public static function getOaEstadoscargoDAO(){
		return new OaEstadoscargoMySqlExtDAO();
	}

	/**
	 * @return PlandecuentasDAO
	 */
	public static function getPlandecuentasDAO(){
		return new PlandecuentasMySqlExtDAO();
	}

	/**
	 * @return TarConveniopaqueteDAO
	 */
	public static function getTarConveniopaqueteDAO(){
		return new TarConveniopaqueteMySqlExtDAO();
	}

	/**
	 * @return TarConveniosDAO
	 */
	public static function getTarConveniosDAO(){
		return new TarConveniosMySqlExtDAO();
	}

	/**
	 * @return TarDetallepaqueteinsumosDAO
	 */
	public static function getTarDetallepaqueteinsumosDAO(){
		return new TarDetallepaqueteinsumosMySqlExtDAO();
	}

	/**
	 * @return TarDetallepaqueteserviciosDAO
	 */
	public static function getTarDetallepaqueteserviciosDAO(){
		return new TarDetallepaqueteserviciosMySqlExtDAO();
	}

	/**
	 * @return TarGrupopaqueteDAO
	 */
	public static function getTarGrupopaqueteDAO(){
		return new TarGrupopaqueteMySqlExtDAO();
	}

	/**
	 * @return TarPreciosserviciosDAO
	 */
	public static function getTarPreciosserviciosDAO(){
		return new TarPreciosserviciosMySqlExtDAO();
	}

	/**
	 * @return TarSubgrupopaqueteDAO
	 */
	public static function getTarSubgrupopaqueteDAO(){
		return new TarSubgrupopaqueteMySqlExtDAO();
	}

	/**
	 * @return TarTipopaqueteDAO
	 */
	public static function getTarTipopaqueteDAO(){
		return new TarTipopaqueteMySqlExtDAO();
	}

	/**
	 * @return ZglbMedicosDAO
	 */
	public static function getZglbMedicosDAO(){
		return new ZglbMedicosMySqlExtDAO();
	}

	/**
	 * @return ZoaCargoDAO
	 */
	public static function getZoaCargoDAO(){
		return new ZoaCargoMySqlExtDAO();
	}

	/**
	 * @return ZoaDetallecargoDAO
	 */
	public static function getZoaDetallecargoDAO(){
		return new ZoaDetallecargoMySqlExtDAO();
	}

	/**
	 * @return ZoaServiciosDAO
	 */
	public static function getZoaServiciosDAO(){
		return new ZoaServiciosMySqlExtDAO();
	}


}
?>